//js 404 PAGE

// Tạo ngôi sao
const starsContainer = document.getElementById('stars');
const numberOfStars = 50;

for (let i = 0; i < numberOfStars; i++) {
    const star = document.createElement('div');
    star.className = 'star';

    const size = Math.random() * 3 + 1;
    star.style.width = size + 'px';
    star.style.height = size + 'px';

    star.style.left = Math.random() * 100 + '%';
    star.style.top = Math.random() * 100 + '%';

    star.style.animationDelay = Math.random() * 2 + 's';
    star.style.animationDuration = (Math.random() * 3 + 2) + 's';

    starsContainer.appendChild(star);
}

// Hiệu ứng chuột di chuyển cho ghost

const ghost = document.querySelector('.ghost');
if (ghost) {
    document.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 20;
        const y = (e.clientY / window.innerHeight - 0.5) * 20;

        ghost.style.transform = `translate(${x}px, ${y}px)`;
    });
}

//js 404 PAGE