document.addEventListener('DOMContentLoaded', function () {
    const nextButton = document.getElementById('next');
    const prevButton = document.getElementById('prev');
    const slide = document.getElementById('slide');
    const items = document.querySelectorAll('.itemz');

    items.forEach(item => {
        const video = item.querySelector('video');
        const seeMoreButton = item.querySelector('.see-more');
        const additionalContent = item.querySelector('.additional-content');
        const content = item.querySelector('.content');
        const goBackButton = item.querySelector('.go-back');

        item.addEventListener('mouseover', () => {
            video.play();
        });

        item.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0; // Reset the video to the start
        });

        // Show additional content and hide original content on "See more" button click
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

        // Hide additional content and show original content on "Go Back" button click
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
    });

    // Slide navigation
    nextButton.onclick = function () {
        let lists = document.querySelectorAll('.itemz');
        slide.appendChild(lists[0]);
    }

    prevButton.onclick = function () {
        let lists = document.querySelectorAll('.itemz');
        slide.prepend(lists[lists.length - 1]);
    }
});
