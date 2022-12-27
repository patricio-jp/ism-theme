"use strict";
// Add 'scroll-smooth' to html tag
// document.documentElement.classList.add('scroll-smooth');

// Dark mode detection
if (localStorage['theme'] === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Dark mode toggle
const toggleDarkMode = () => {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage['theme'] = 'light';
        document.querySelector('[data-fa-i2svg]').classList.remove('fa-sun');
        document.querySelector('[data-fa-i2svg]').classList.add('fa-moon');
    } else {
        document.documentElement.classList.add('dark');
        localStorage['theme'] = 'dark';
        document.querySelector('[data-fa-i2svg]').classList.add('fa-sun');
        document.querySelector('[data-fa-i2svg]').classList.remove('fa-moon');
    }
}

// Remove theme preferences
const removeThemePreference = () => {
    localStorage.removeItem('theme');
}

// NavBar toggle
document.querySelector('#navBarToggle').addEventListener('click', () => {
    const navBar = document.querySelector('#navbar');
    document.querySelector('#navBarToggle [data-fa-i2svg]').classList.toggle('fa-xmark');
    document.querySelector('#navBarToggle [data-fa-i2svg]').classList.toggle('fa-bars');
    navBar.classList.toggle('hidden');

    // Dropdown menu

});

const toggleDropdown = (e) => {
    e.preventDefault();
    const elementClicked = e.target;
    // console.log(elementClicked);
    if (elementClicked.classList.contains('dropdownToggle')) {
        // If click <span>
        const parent = elementClicked.parentNode.parentNode;
        // console.log("Clicked span");
        // console.log(parent);
        parent.querySelector('.dropdown-menu').classList.toggle('active');
        elementClicked.querySelector('[data-fa-i2svg]').classList.toggle('fa-caret-down');
        elementClicked.querySelector('[data-fa-i2svg]').classList.toggle('fa-caret-up');
    } else if (elementClicked.hasAttribute('data-fa-i2svg')) {
        // Clicked <svg>
        const parent = elementClicked.parentNode.parentNode.parentNode;
        // console.log("Clicked svg");
        // console.log(parent);
        parent.querySelector('.dropdown-menu').classList.toggle('active');
        elementClicked.classList.toggle('fa-caret-up');
        elementClicked.classList.toggle('fa-caret-down');
    } else {
        // Clicked <path>
        const parent = elementClicked.parentNode.parentNode.parentNode.parentNode;
        // console.log("Clicked path");
        // console.log(parent);
        parent.querySelector('.dropdown-menu').classList.toggle('active');
        elementClicked.parentNode.classList.toggle('fa-caret-up');
        elementClicked.parentNode.classList.toggle('fa-caret-down');
    }

}

document.querySelectorAll('.dropdownToggle').forEach(function (el) {
    el.addEventListener('click', (e) => {
        toggleDropdown(e);
    });
});

// document.querySelectorAll('.menu-item-has-children').forEach(function (el) {
//     hover(el, el.querySelector('.dropdown-menu'), 'active');
// });


