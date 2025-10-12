// Translation System
const translations = {
    en: {
        // Navigation
        nav_home: "Home",
        nav_about: "About",
        nav_portfolio: "Portfolio",
        nav_services: "Services",
        nav_pages: "Pages",
        nav_blog: "Blog",
        nav_blog_details: "Blog Details",
        nav_contact: "Contact",
        
        // Hero Section
        hero_subtitle: "For website and video editing",
        hero_name: "Tarek ElShouhdy",
        hero_button: "See more about us",
        
        // About Section
        about_subtitle: "About videograph",
        about_title: "Who we are?",
        
        // Services Section
        services_subtitle: "Our services",
        services_title: "What We do?",
        services_description: "If you hire a videographer of our team you will get a video professional to make a custom video for your business and, once the project is over.",
        services_button: "View all services",
        
        // Service Items
        service_motion_graphics: "Motion graphics",
        service_color_grading: "Color Grading",
        service_voice_over: "Songs and voice-over",
        service_video_editing: "Video Editing",
        
        // Partners Section
        partners_title: "We Work With the Best Partners",
        partners_description: "While we are at the forefront of and specialize in design-build, we are very familiar with a number of delivery methods and are confident we can find the process that will best help you meet your goals.",
        partners_button: "READ MORE",
        
        // Work Section
        work_subtitle: "Our Portfolio",
        work_title: "Recent Work",
        
        // Color Grading Section
        color_grading_subtitle: "Color Grading",
        color_grading_title: "Before & After",
        color_grading_interactive: "Interactive Comparisons",
        
        // Songs Section
        songs_subtitle: "Pieces of My Work",
        songs_title: "Songs Taken",
        
        // Footer
        footer_about_title: "About us",
        footer_who_we_are: "Who we are",
        footer_our_work: "Our work",
        footer_newsletter: "Newsletter"
    },
    ar: {
        // Navigation
        nav_home: "الرئيسية",
        nav_about: "من نحن",
        nav_portfolio: "معرض الأعمال",
        nav_services: "الخدمات",
        nav_pages: "الصفحات",
        nav_blog: "المدونة",
        nav_blog_details: "تفاصيل المدونة",
        nav_contact: "اتصل بنا",
        
        // Hero Section
        hero_subtitle: "لتصميم المواقع وتحرير الفيديو",
        hero_name: "طارق الشهدي",
        hero_button: "اعرف المزيد عنا",
        
        // About Section
        about_subtitle: "عن فيديوغراف",
        about_title: "من نحن؟",
        
        // Services Section
        services_subtitle: "خدماتنا",
        services_title: "ماذا نفعل؟",
        services_description: "إذا استأجرت مصور فيديو من فريقنا ستحصل على محترف فيديو لصنع فيديو مخصص لعملك، وبمجرد انتهاء المشروع.",
        services_button: "عرض جميع الخدمات",
        
        // Service Items
        service_motion_graphics: "الرسوم المتحركة",
        service_color_grading: "تدرج الألوان",
        service_voice_over: "الأغاني والتعليق الصوتي",
        service_video_editing: "تحرير الفيديو",
        
        // Partners Section
        partners_title: "نعمل مع أفضل الشركاء",
        partners_description: "بينما نحن في المقدمة ونختص في التصميم والبناء، نحن مألوفون جداً مع عدد من طرق التسليم وواثقون من أننا يمكننا العثور على العملية التي ستساعدك بشكل أفضل في تحقيق أهدافك.",
        partners_button: "اقرأ المزيد",
        
        // Work Section
        work_subtitle: "معرض أعمالنا",
        work_title: "أعمال حديثة",
        
        // Color Grading Section
        color_grading_subtitle: "تدرج الألوان",
        color_grading_title: "قبل وبعد",
        color_grading_interactive: "مقارنات تفاعلية",
        
        // Songs Section
        songs_subtitle: "قطع من عملي",
        songs_title: "الأغاني المأخوذة",
        
        // Footer
        footer_about_title: "من نحن",
        footer_who_we_are: "من نحن",
        footer_our_work: "أعمالنا",
        footer_newsletter: "النشرة الإخبارية"
    }
};

// Language toggle functionality
let currentLanguage = 'en';

document.addEventListener('DOMContentLoaded', function() {
    const langToggle = document.getElementById('lang-toggle');
    
    // Load saved language preference
    const savedLang = localStorage.getItem('language') || 'en';
    currentLanguage = savedLang;
    updateLanguage();
    
    // Toggle language on button click
    langToggle.addEventListener('click', function() {
        currentLanguage = currentLanguage === 'en' ? 'ar' : 'en';
        localStorage.setItem('language', currentLanguage);
        updateLanguage();
        updateLanguageButton();
    });
    
    // Update button text
    updateLanguageButton();
});

function updateLanguage() {
    const elements = document.querySelectorAll('[data-translate]');
    
    elements.forEach(element => {
        const key = element.getAttribute('data-translate');
        if (translations[currentLanguage][key]) {
            element.textContent = translations[currentLanguage][key];
        }
    });
    
    // Update page direction for Arabic
    if (currentLanguage === 'ar') {
        document.documentElement.setAttribute('dir', 'rtl');
        document.documentElement.setAttribute('lang', 'ar');
    } else {
        document.documentElement.setAttribute('dir', 'ltr');
        document.documentElement.setAttribute('lang', 'en');
    }
}

function updateLanguageButton() {
    const langToggle = document.getElementById('lang-toggle');
    langToggle.textContent = currentLanguage === 'en' ? 'العربية' : 'English';
}
