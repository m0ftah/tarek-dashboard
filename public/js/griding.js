document.addEventListener("DOMContentLoaded", () => {
  // Function to load images onto canvases and preserve aspect ratio using "cover" logic
  async function loadAndDrawImages(viewerId, originalSrc, gradedSrc) {
    const originalCanvas = document.getElementById(`canvasOriginal${viewerId}`);
    const gradedCanvas = document.getElementById(`canvasGraded${viewerId}`);
    const originalCtx = originalCanvas.getContext("2d");
    const gradedCtx = gradedCanvas.getContext("2d");

    const loadImage = (src) =>
      new Promise((resolve, reject) => {
        const img = new Image();
        img.onload = () => resolve(img);
        img.onerror = reject;
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
        // Set canvas resolution to match its display size for high quality
        canvas.width = canvas.clientWidth;
        canvas.height = canvas.clientHeight;

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
        ctx.drawImage(img, sx, sy, sWidth, sHeight, 0, 0, canvas.width, canvas.height);
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
    let isDragging = false;

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
  viewers.forEach((viewer) => {
    initComparisonSlider(viewer);

    const viewerId = viewer.id.replace("viewer", "");
    
    // !!! IMPORTANT: Replace these paths with your actual image URLs !!!
    // Create an array of image pairs to handle multiple sets
    const imagePairs = [
      { original: "img/colorsGrading/after.png", graded: "img/colorsGrading/before.png" },
      { original: "img/colorsGrading/after.png", graded: "img/colorsGrading/before.png" },
      { original: "img/colorsGrading/after.png", graded: "img/colorsGrading/before.png" }
    ];

    // Check if the current viewer has a corresponding image pair
    if (viewerId >= 1 && viewerId <= imagePairs.length) {
      const pair = imagePairs[viewerId - 1];
      loadAndDrawImages(viewerId, pair.original, pair.graded);
    }
  });
});