import type { Config } from "tailwindcss";

// Palette Synera Group — dérivée du logo (violet dominant #7030A0).
// Modifie les valeurs ci-dessous pour ajuster l'identité visuelle du site.
const config: Config = {
  darkMode: "class",
  content: [
    "./src/**/*.{ts,tsx}",
    "./content/**/*.json",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "#7030A0",
          50: "#F5EEFB",
          100: "#E9DAF5",
          200: "#D2B4EB",
          300: "#B98CE0",
          400: "#9C63CE",
          500: "#7030A0",
          600: "#5E2986",
          700: "#4A1F6B",
          800: "#371750",
          900: "#241035",
        },
        accent: {
          DEFAULT: "#C9A227",
          50: "#FBF5E3",
          100: "#F5E7BE",
          200: "#EBCF7D",
          300: "#DFB84F",
          400: "#C9A227",
          500: "#A9871E",
          600: "#876B18",
        },
        ink: {
          DEFAULT: "#1C1524",
          50: "#F7F5FA",
          100: "#EDE9F2",
          400: "#6B6475",
          700: "#2A2233",
          800: "#1F1929",
          900: "#14121A",
        },
      },
      fontFamily: {
        display: ["var(--font-display)", "sans-serif"],
        sans: ["var(--font-sans)", "sans-serif"],
      },
      maxWidth: {
        content: "1240px",
      },
      boxShadow: {
        soft: "0 8px 30px -12px rgba(28, 21, 36, 0.25)",
        card: "0 2px 20px -4px rgba(28, 21, 36, 0.12)",
      },
      backgroundImage: {
        "gradient-brand": "linear-gradient(135deg, #7030A0 0%, #4A1F6B 100%)",
      },
      animation: {
        marquee: "marquee 30s linear infinite",
      },
      keyframes: {
        marquee: {
          "0%": { transform: "translateX(0)" },
          "100%": { transform: "translateX(-50%)" },
        },
      },
    },
  },
  plugins: [require("@tailwindcss/typography")],
};

export default config;
