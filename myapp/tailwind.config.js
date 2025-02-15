module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        "text-red-500",
        "text-green-500",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#6D28D9",
                secondary: "#DB2777",
                accent: "#F59E0B",
                red: "#EF4444",
                green: "#10B981",
            },
        },
    },
    plugins: [],
};
