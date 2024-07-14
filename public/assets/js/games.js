document.addEventListener('DOMContentLoaded', function () {
    const nextButton = document.getElementById('next');
    const prevButton = document.getElementById('prev');
    const slide = document.getElementById('slide');
    const items = document.querySelectorAll('.itemz');

    // Initial setup for each game item
    items.forEach(item => {
        const video = item.querySelector('video');
        const seeMoreButton = item.querySelector('.see-more');
        const additionalContent = item.querySelector('.additional-content');
        const content = item.querySelector('.content');
        const goBackButton = item.querySelector('.go-back');
        const addToCartButton = item.querySelector('.add-to-cart');

        // Video play/pause on hover
        item.addEventListener('mouseover', () => {
            video.play();
        });

        item.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0;
        });

        // Expand additional content
        seeMoreButton.addEventListener('click', () => {
            content.style.opacity = '0';
            setTimeout(() => {
                content.style.display = 'none';
                additionalContent.style.display = 'block';
                setTimeout(() => {
                    additionalContent.style.opacity = '1';
                }, 10);
            }, 500);
        });

        // Collapse additional content
        goBackButton.addEventListener('click', () => {
            additionalContent.style.opacity = '0';
            setTimeout(() => {
                additionalContent.style.display = 'none';
                content.style.display = 'block';
                setTimeout(() => {
                    content.style.opacity = '1';
                }, 10);
            }, 500);
        });

        // Add to cart functionality
        addToCartButton.addEventListener('click', function(e) {
            e.preventDefault();
            const gameId = this.getAttribute('data-game-id');
            
            fetch(`/game-cart/add/${gameId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    // Optionally update cart count or other UI elements
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error adding game to cart');
            });
        });
    });

    // Slide navigation
    nextButton.onclick = function () {
        let lists = document.querySelectorAll('.itemz');
        slide.appendChild(lists[0]);
    };

    prevButton.onclick = function () {
        let lists = document.querySelectorAll('.itemz');
        slide.prepend(lists[lists.length - 1]);
    };
});
