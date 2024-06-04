import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/light/assets/authentication/auth-boxed.scss',
                'resources/scss/dark/assets/authentication/auth-boxed.scss',
                'resources/scss/layouts/modern-light-menu/light/loader.scss',
                'resources/layouts/modern-light-menu/loader.js',
                'resources/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss',
                'resources/scss/layouts/modern-light-menu/light/structure.scss',
                'resources/scss/layouts/modern-light-menu/dark/structure.scss',
                'resources/layouts/modern-light-menu/app.js',
                'resources/scss/light/plugins/table/datatable/dt-global_style.scss',
                'resources/scss/light/plugins/table/datatable/custom_dt_custom.scss',
                'resources/scss/dark/plugins/table/datatable/dt-global_style.scss',
                'resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss',
                'resources/assets/js/custom.js',
                'resources/scss/light/assets/components/list-group.scss',
                'resources/scss/light/assets/widgets/modules-widgets.scss',
                'resources/scss/dark/assets/components/list-group.scss',
                'resources/scss/dark/assets/widgets/modules-widgets.scss',
                'resources/assets/js/widgets/_wSix.js',
                'resources/assets/js/widgets/_wChartThree.js',
                'resources/assets/js/widgets/_wHybridOne.js',
                'resources/assets/js/widgets/_wActivityFive.js',
                'resources/scss/light/assets/main.scss',
                'resources/scss/dark/assets/main.scss',
                'resources/css/login.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
