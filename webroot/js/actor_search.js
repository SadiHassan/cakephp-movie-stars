document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchInput');
    const actorItems = document.querySelectorAll('.actor-item');
    const noMatch = document.getElementById('noMatch');

    input.addEventListener('input', () => {
        const search = input.value.trim().toLowerCase();
        let found = false;

        actorItems.forEach(item => {
            const name = item.querySelector('.actor-name').textContent.toLowerCase();
            const match = name.includes(search);
            item.style.display = match ? 'block' : 'none';
            if (match) found = true;
        });

        noMatch.style.display = found ? 'none' : 'block';
    });
});
