// Sidebar Toggle Animation
const hamburger = document.querySelector('.hamburger');
const sidebar   = document.querySelector('.sidebar');
const stick = hamburger.querySelectorAll('.stick');

hamburger.addEventListener('click', () => {
    if(sidebar.classList.contains('d-none')) {
        sidebar.classList.remove('d-none');
    }

    if(!sidebar.classList.toggle('sidebar-none')) {
        if(sidebar.classList.contains('sidebar-open')) {
            sidebar.classList.remove('sidebar-open');
        }
        if(sidebar.classList.contains('sidebar-close')) {
            sidebar.classList.remove('sidebar-close');
        }
        sidebar.classList.add('sidebar-open');
    } else {
        if(sidebar.classList.contains('sidebar-close')) {
            sidebar.classList.remove('sidebar-close');
        }
        if(sidebar.classList.contains('sidebar-open')) {
            sidebar.classList.remove('sidebar-open');
        }
        sidebar.classList.add('sidebar-close');
    }

    stick.forEach(e => {
        e.classList.toggle('bg-white');
    });
});