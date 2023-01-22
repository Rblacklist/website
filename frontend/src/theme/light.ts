import { colors } from './colors';
import { StyledTheme } from './theme.types';

const breakpoints = {
  mobile: '600px',
  tablet: '992px',
  laptop: '1200px',
  desktop: '1400px',
};

const defaultFontFamily = '"Roboto", "Helvetica", "Arial", sans-serif';

export const light: StyledTheme = {
  breakpoints,
  devices: {
    mobile: `(max-width: ${breakpoints.mobile})`,
    tablet: `(max-width: ${breakpoints.tablet})`,
    laptop: `(max-width: ${breakpoints.laptop})`,
    desktop: `(max-width: ${breakpoints.desktop})`,
  },
  typography: {
    fontFamily: defaultFontFamily,
    fontWeightLight: 300,
    fontWeightRegular: 400,
    fontWeightMedium: 500,
    fontWeightBold: 700,
    h1: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 500,
      fontSize: '2.031rem',
      lineHeight: 1.2,
    },
    h2: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 500,
      fontSize: '1.625rem',
      lineHeight: 1.2,
    },
    h3: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 500,
      fontSize: '1.42188rem',
      lineHeight: 1.2,
    },
    h4: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 500,
      fontSize: '1.21875rem',
      lineHeight: 1.2,
    },
    h5: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 500,
      fontSize: '1.01563rem',
      lineHeight: 1.2,
    },
    h6: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 500,
      fontSize: '0.8125rem',
      lineHeight: 1.2,
    },
    body1: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 400,
      fontSize: '1rem',
      lineHeight: 1.5,
    },
    body2: {
      fontFamily: `"Poppins", "Helvetica", "Arial", sans-serif"`,
      fontWeight: 400,
      fontSize: '0.875rem',
      lineHeight: 1.43,
    },
  },
  palette: {
    ...colors,
  },
  sizes: {
    layout: {
      header: '70px',
    },
    icon: {},
  },
  shadow: {
    shadowSm: '0 0.125rem 0.25rem  rgba(0,0,0,.075)',
    shadow: '0 0.75rem 1.5rem rgba(18,38,63,.03)',
    shadowLg: '0 0.75rem 1.5rem rgba(0,0,0,.175)',
  },
};
