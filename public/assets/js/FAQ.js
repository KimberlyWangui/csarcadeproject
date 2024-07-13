document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            const isOpen = answer.classList.contains('show');

            // Close all other answers
            document.querySelectorAll('.faq-answer').forEach(item => {
                item.classList.remove('show');
                item.style.maxHeight = null;
            });

            document.querySelectorAll('.faq-question').forEach(item => {
                item.classList.remove('active');
            });

            // Toggle the clicked answer
            if (!isOpen) {
                answer.classList.add('show');
                question.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + "px";
            }
        });
    });
});