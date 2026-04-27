    @livewireScripts

    <script>
        const htmlElement = document.documentElement;
        const savedTheme = localStorage.getItem('theme');

        if (savedTheme === 'dark')
            htmlElement.classList.add('dark');
        else
            htmlElement.classList.remove('dark');
    </script>
    </body>

    </html>
