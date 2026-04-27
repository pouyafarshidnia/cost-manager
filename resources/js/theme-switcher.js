document.addEventListener('alpine:init', () => {

    const htmlElement = document.documentElement;
    const savedTheme = localStorage.getItem('theme')

    if (savedTheme === 'dark')
        htmlElement.classList.add('dark')
    else
        htmlElement.classList.remove('dark')

    /*  Theme Switcher  */
    Alpine.data('themeSwitcher', () => ({
        dark: savedTheme === 'dark',
        change() {
            this.dark = !this.dark;
            htmlElement.classList.toggle('dark');
            localStorage.setItem('theme', this.dark ? 'dark' : 'light')
        },

    }));

});




