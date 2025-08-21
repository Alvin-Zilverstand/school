document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('projects');
    
    // Add loading state with enhanced spinner
    container.innerHTML = '<div class="col-span-full text-center p-8"><div class="spinner mx-auto mb-4"></div><p class="text-gray-500 dark:text-gray-400">Loading projects...</p></div>';
    
    // Create modal element with enhanced styling
    const modal = document.createElement('div');
    modal.className = 'modal-overlay fixed inset-0 hidden items-center justify-center z-50 transition-opacity duration-300';
    modal.innerHTML = `
        <div class="modal-content max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <h2 class="text-3xl font-bold"></h2>
                    <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700" onclick="closeModal()">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-content">
                    <div class="modal-image mb-6"></div>
                    <div class="modal-description text-gray-700 dark:text-gray-300 mb-6 text-lg"></div>
                    <div class="modal-tags mb-6"></div>
                    <div class="modal-links"></div>
                </div>
            </div>
        </div>
    `;
    document.body.appendChild(modal);

    // Add modal functions to window
    window.openModal = (project) => {
        const modalTitle = modal.querySelector('h2');
        const modalImage = modal.querySelector('.modal-image');
        const modalDescription = modal.querySelector('.modal-description');
        const modalTags = modal.querySelector('.modal-tags');
        const modalLinks = modal.querySelector('.modal-links');
        const modalContent = modal.querySelector('.modal-content');

        modalTitle.textContent = project.title;
        
        if (project.image_url) {
            modalImage.innerHTML = `<img src="${project.image_url}" alt="${project.title}" class="project-image w-full h-96 object-cover shadow-lg">`;
        } else {
            modalImage.innerHTML = '<div class="w-full h-96 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-lg flex items-center justify-center"><svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>';
        }

        modalDescription.innerHTML = `
            <p class="text-lg mb-4 leading-relaxed">${project.description || ''}</p>
            ${project.long_description ? `<p class="mt-6 leading-relaxed text-gray-600 dark:text-gray-400">${project.long_description}</p>` : ''}
        `;

        if (project.tags) {
            modalTags.innerHTML = `
                <div class="flex flex-wrap gap-2">
                    ${project.tags.split(',').map(tag => 
                        `<span class="tag">${tag.trim()}</span>`
                    ).join('')}
                </div>
            `;
        } else {
            modalTags.innerHTML = '';
        }

        modalLinks.innerHTML = project.project_url ? 
            `<a href="${project.project_url}" target="_blank" class="btn-primary inline-block">View Project →</a>` : '';

        // Show modal with animation
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Trigger animation
        requestAnimationFrame(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        });
    };

    window.closeModal = () => {
        const modalContent = modal.querySelector('.modal-content');
        
        // Start closing animation
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        
        // Wait for animation to finish before hiding
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }, 300);
    };

    // Close modal when clicking outside
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
    
    // Enhanced project fetching with error handling
    fetch('php/get_projects.php')
        .then(res => {
            if (!res.ok) {
                throw new Error(`HTTP error! status: ${res.status}`);
            }
            return res.json();
        })
        .then(projects => {
            if (!Array.isArray(projects) || projects.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full text-center p-8">
                        <div class="w-24 h-24 mx-auto mb-4 text-gray-400">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-lg">No projects found.</p>
                        <p class="text-sm text-gray-400 dark:text-gray-500 mt-2">Projects will appear here once added.</p>
                    </div>`;
                return;
            }
            
            container.innerHTML = '';
            
            // Add projects with CSS animations
            projects.forEach((project) => {
                const card = document.createElement('div');
                card.className = 'project-card p-5 flex flex-col cursor-pointer hover-lift';
                
                card.onclick = () => openModal(project);
                
                if (project.image_url) {
                    card.innerHTML += `<img src="${project.image_url}" alt="${project.title}" class="project-image mb-4 h-40 object-cover w-full">`;
                } else {
                    card.innerHTML += `<div class="project-image mb-4 h-40 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-lg flex items-center justify-center"><svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>`;
                }
                
                card.innerHTML += `
                    <h2 class="text-xl font-semibold mb-2">${project.title}</h2>
                    <p class="text-gray-700 dark:text-gray-300 mb-3 flex-grow">${project.description || ''}</p>
                    ${project.tags ? `<div class="mb-3 flex flex-wrap gap-1">${project.tags.split(',').map(tag => `<span class="tag text-xs">${tag.trim()}</span>`).join('')}</div>` : ''}
                    ${project.project_url ? `<a href="${project.project_url}" target="_blank" class="mt-auto inline-block text-blue-600 dark:text-blue-400 hover:underline font-medium transition-colors" onclick="event.stopPropagation()">View Project →</a>` : ''}
                `;
                
                container.appendChild(card);
            });
        })
        .catch(err => {
            console.error('Error fetching projects:', err);
            container.innerHTML = `
                <div class="col-span-full text-center p-8">
                    <div class="w-24 h-24 mx-auto mb-4 text-red-400">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-red-500 dark:text-red-400 mb-2 text-lg">Failed to load projects.</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Error: ${err.message}</p>
                    <button onclick="location.reload()" class="btn-primary mt-4">Try Again</button>
                </div>`;
        });
});

// Add fadeInUp animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style); 