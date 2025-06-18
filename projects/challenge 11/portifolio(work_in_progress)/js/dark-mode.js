// Dark mode functionality with enhanced animations
function initDarkMode() {
    
    // Check for saved theme preference or use system preference
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
        document.documentElement.classList.add('dark');
    } else {

    }

    // Remove existing toggle button if it exists
    const existingButton = document.getElementById('theme-toggle');
    if (existingButton) {
        existingButton.remove();
    }

    // Create and add the theme toggle button with fallback styling
    const toggleButton = document.createElement('button');
    toggleButton.id = 'theme-toggle';
    toggleButton.setAttribute('aria-label', 'Toggle dark mode');
    
    // Use inline styles as fallback
    const isDark = document.documentElement.classList.contains('dark');
    toggleButton.style.cssText = `
        position: fixed;
        bottom: 1rem;
        left: 1rem;
        z-index: 9999;
        background: ${isDark ? '#334155' : '#ffffff'};
        border: 2px solid ${isDark ? '#475569' : '#e2e8f0'};
        border-radius: 50%;
        padding: 0.75rem;
        box-shadow: 0 4px 12px ${isDark ? 'rgba(0,0,0,0.3)' : 'rgba(0,0,0,0.1)'};
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 3rem;
        height: 3rem;
    `;
    
    toggleButton.innerHTML = `
        <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: ${isDark ? '#f1f5f9' : '#1e293b'}">
            <path class="sun-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            <path class="moon-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" style="display: ${isDark ? 'block' : 'none'}" />
        </svg>
    `;
    
    document.body.appendChild(toggleButton);

    // Add click handler with enhanced animation
    toggleButton.addEventListener('click', () => {
        
        // Add click animation
        toggleButton.style.transform = 'scale(0.9)';
        setTimeout(() => {
            toggleButton.style.transform = '';
        }, 150);

        // Toggle theme
        const newIsDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', newIsDark ? 'dark' : 'light');
        
        // Update button styles
        toggleButton.style.background = newIsDark ? '#334155' : '#ffffff';
        toggleButton.style.borderColor = newIsDark ? '#475569' : '#e2e8f0';
        toggleButton.style.boxShadow = newIsDark ? '0 4px 12px rgba(0,0,0,0.3)' : '0 4px 12px rgba(0,0,0,0.1)';
        
        const svg = toggleButton.querySelector('svg');
        svg.style.color = newIsDark ? '#f1f5f9' : '#1e293b';
        
        const sunIcon = toggleButton.querySelector('.sun-icon');
        const moonIcon = toggleButton.querySelector('.moon-icon');
        
        if (newIsDark) {
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'block';
        } else {
            sunIcon.style.display = 'block';
            moonIcon.style.display = 'none';
        }
        
        // Add theme transition effect
        addThemeTransitionEffect();
    });

    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            if (e.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    });
}

function addThemeTransitionEffect() {
    // Create a temporary overlay for smooth transition
    const overlay = document.createElement('div');
    overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: ${document.documentElement.classList.contains('dark') ? '#0f172a' : '#ffffff'};
        z-index: 9998;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    `;
    document.body.appendChild(overlay);

    // Fade in and out
    requestAnimationFrame(() => {
        overlay.style.opacity = '0.1';
        setTimeout(() => {
            overlay.style.opacity = '0';
            setTimeout(() => {
                if (document.body.contains(overlay)) {
                    document.body.removeChild(overlay);
                }
            }, 300);
        }, 150);
    });
}

// Initialize dark mode when the DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initDarkMode);
} else {
    // DOM is already loaded
    initDarkMode();
}

// Also try to initialize after a short delay to ensure everything is ready
setTimeout(initDarkMode, 100); 