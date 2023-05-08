
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,php,js}"],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: "20px",
      },
    },
    screens: {
      xs: "480px",
      sm: "576px",
      md: "768px",
      lg: "992px",
      xl: "1200px",
      xxl: "1400px",
      xxxl: "1600px",
    },
    extend: {
      colors: {
        primary: "#359c0f",
        secondary: "#C1D996",
        yellow: "#E8E778",
        yellow1: "#F2D170",
        yellow2: "#FFF489",
        dark: "#222222",
      },
      fontSize: {
        32: "32px",
        54: "54px",
      },
      lineHeight: {
        25.6: "25.6px",
        57.6: "57.6px",
        64.8: "64.8px"
      }
    },
  },
  plugins: [],
};
