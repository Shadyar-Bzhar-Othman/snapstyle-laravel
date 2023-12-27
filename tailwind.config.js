/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // It will include all file and subdirectory files in resources directory
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primaryColor: "#F83758",
                secondaryColor: "#FA7189",
                greyColor: "#F5F6FA",
                darkgreyColor: "#8F959E",
                whiteColor: "#FEFEFE",
                blackColor: "#1D1E20",
            },
        },
    },
    plugins: [],
};
