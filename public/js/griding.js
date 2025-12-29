document.addEventListener("DOMContentLoaded", () => {
    // Function to load images onto canvases and preserve aspect ratio using "cover" logic
    async function loadAndDrawImages(viewerId, originalSrc, gradedSrc) {
        const originalCanvas = document.getElementById(
            `canvasOriginal${viewerId}`
        );
        const gradedCanvas = document.getElementById(`canvasGraded${viewerId}`);

        // Check if canvases exist
        if (!originalCanvas || !gradedCanvas) {
            console.error(`Canvas elements not found for viewer ${viewerId}`);
            return;
        }

        const originalCtx = originalCanvas.getContext("2d");
        const gradedCtx = gradedCanvas.getContext("2d");

        // Ensure canvas elements have dimensions
        const viewer = document.getElementById(`viewer${viewerId}`);
        if (viewer) {
            // Use getBoundingClientRect for accurate dimensions on real devices
            const rect = viewer.getBoundingClientRect();
            const actualWidth = Math.floor(rect.width);
            const actualHeight = Math.floor(rect.height);
            
            // Set canvas dimensions to match actual content area
            originalCanvas.width = Math.max(actualWidth, 1);
            originalCanvas.height = Math.max(actualHeight, 1);
            gradedCanvas.width = Math.max(actualWidth, 1);
            gradedCanvas.height = Math.max(actualHeight, 1);
            
            // Set explicit CSS dimensions to prevent overflow
            originalCanvas.style.width = `${actualWidth}px`;
            originalCanvas.style.height = `${actualHeight}px`;
            originalCanvas.style.maxWidth = '100%';
            originalCanvas.style.boxSizing = 'border-box';
            
            gradedCanvas.style.width = `${actualWidth}px`;
            gradedCanvas.style.height = `${actualHeight}px`;
            gradedCanvas.style.maxWidth = '100%';
            gradedCanvas.style.boxSizing = 'border-box';
        }

        const loadImage = (src) =>
            new Promise((resolve, reject) => {
                const img = new Image();
                img.onload = () => resolve(img);
                img.onerror = (err) => {
                    console.error(`Failed to load image: ${src}`, err);
                    reject(err);
                };
                img.src = src;
            });

        try {
            const [originalImg, gradedImg] = await Promise.all([
                loadImage(originalSrc),
                loadImage(gradedSrc),
            ]);

            // Helper function to draw the image with "cover" behavior
            const drawCover = (ctx, img) => {
                const canvas = ctx.canvas;
                // Get the viewer to calculate actual dimensions
                const viewer = document.getElementById(`viewer${viewerId}`);
                let actualWidth, actualHeight;
                
                if (viewer) {
                    // Use getBoundingClientRect for more accurate dimensions on real devices
                    const rect = viewer.getBoundingClientRect();
                    actualWidth = Math.floor(rect.width);
                    actualHeight = Math.floor(rect.height);
                } else {
                    // Fallback to client dimensions
                    actualWidth = canvas.clientWidth || 1;
                    actualHeight = canvas.clientHeight || 1;
                }
                
                // Set canvas resolution to match display size
                canvas.width = Math.max(actualWidth, 1);
                canvas.height = Math.max(actualHeight, 1);
                
                // Ensure CSS size matches to prevent overflow
                canvas.style.width = `${actualWidth}px`;
                canvas.style.height = `${actualHeight}px`;
                canvas.style.maxWidth = '100%';
                canvas.style.boxSizing = 'border-box';

                const canvasRatio = canvas.width / canvas.height;
                const imgRatio = img.naturalWidth / img.naturalHeight;

                let sWidth = img.naturalWidth;
                let sHeight = img.naturalHeight;
                let sx = 0;
                let sy = 0;

                // This logic decides whether to crop the sides or the top/bottom
                if (imgRatio > canvasRatio) {
                    // Image is wider than canvas, so crop sides
                    sHeight = img.naturalHeight;
                    sWidth = sHeight * canvasRatio;
                    sx = (img.naturalWidth - sWidth) / 2;
                } else {
                    // Image is taller than canvas, so crop top/bottom
                    sWidth = img.naturalWidth;
                    sHeight = sWidth / canvasRatio;
                    sy = (img.naturalHeight - sHeight) / 2;
                }

                // Clear previous image and draw the new, correctly-scaled one
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(
                    img,
                    sx,
                    sy,
                    sWidth,
                    sHeight,
                    0,
                    0,
                    canvas.width,
                    canvas.height
                );
            };

            // Draw both images using the new cover logic
            drawCover(originalCtx, originalImg);
            drawCover(gradedCtx, gradedImg);
        } catch (error) {
            console.error("Error loading images:", error);
        }
    }

    // Function to initialize a single slider
    function initComparisonSlider(viewer) {
        const handle = viewer.querySelector(".griding-handle");
        const divider = viewer.querySelector(".griding-divider");
        const gradedCanvas = viewer.querySelector(".griding-graded");

        // Check if required elements exist
        if (!handle || !divider || !gradedCanvas) {
            console.error("Required elements not found for viewer", viewer);
            return;
        }

        let isDragging = false;

        // Initially hide the graded image (show only the original)
        gradedCanvas.style.clipPath = `inset(0 0 0 50%)`;

        // Reset any inline styles that might interfere with CSS positioning
        handle.style.left = "";
        handle.style.top = "";
        divider.style.left = "";

        // Force a reflow to ensure CSS transforms are applied
        handle.offsetHeight;
        divider.offsetHeight;

        const startDrag = () => {
            isDragging = true;
        };

        const stopDrag = () => {
            isDragging = false;
        };

        const onDrag = (e) => {
            if (!isDragging) return;

            // Use touch or mouse coordinates
            const clientX = e.touches ? e.touches[0].clientX : e.clientX;

            const viewerRect = viewer.getBoundingClientRect();
            let position = (clientX - viewerRect.left) / viewerRect.width;

            // Clamp position between 0 and 1
            position = Math.max(0, Math.min(1, position));

            const percent = position * 100;

            // Update the position of the handle and divider
            handle.style.left = `${percent}%`;
            divider.style.left = `${percent}%`;

            // Update the clip-path of the top (graded) canvas
            gradedCanvas.style.clipPath = `inset(0 0 0 ${percent}%)`;
        };

        handle.addEventListener("mousedown", startDrag);
        handle.addEventListener("touchstart", startDrag, { passive: true });

        window.addEventListener("mouseup", stopDrag);
        window.addEventListener("touchend", stopDrag);

        window.addEventListener("mousemove", onDrag);
        window.addEventListener("touchmove", onDrag, { passive: true });
    }

    // --- INITIALIZE ALL SLIDERS ---
    const viewers = document.querySelectorAll(".griding-viewer");
    const viewerData = [];
    
    viewers.forEach((viewer) => {
        initComparisonSlider(viewer);

        const viewerId = viewer.id.replace("viewer", "");

        // Get image paths from data attributes instead of hardcoded paths
        const originalSrc = viewer.getAttribute("data-before");
        const gradedSrc = viewer.getAttribute("data-after");

        // Store viewer data for resize handling
        viewerData.push({
            viewerId,
            originalSrc,
            gradedSrc,
        });

        // Load images with the correct sources
        if (originalSrc && gradedSrc) {
            loadAndDrawImages(viewerId, originalSrc, gradedSrc);
        } else {
            console.error(`Missing image sources for viewer ${viewerId}`, {
                originalSrc,
                gradedSrc,
            });
        }
    });

    // Handle window resize to redraw canvases
    let resizeTimeout;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            viewerData.forEach(({ viewerId, originalSrc, gradedSrc }) => {
                if (originalSrc && gradedSrc) {
                    loadAndDrawImages(viewerId, originalSrc, gradedSrc);
                }
            });
        }, 250);
    });
});
