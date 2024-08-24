// /** @type {import('tailwindcss').Config} */
// export default {
//   content: [
//     "./resources/**/*.blade.php",
//     "./resources/**/*.js",
//     "./resources/**/*.vue",
//   ],
//   theme: {
//     extend: {},
//   },
//   plugins: [],
// }

/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    purge: ['./resources/**/*.blade.php'],
    theme: {
      extend: {
        fontFamily: {
          roboto: ['Roboto'],
        },
      },
    },
    variants: {},
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }
