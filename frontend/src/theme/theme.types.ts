import { DefaultTheme } from 'styled-components';

export interface StyledTheme extends DefaultTheme {
  breakpoints: {
    mobile: string;
    tablet: string;
    laptop: string;
  };
  devices: {
    mobile: string;
    tablet: string;
    laptop: string;
    desktop: string;
  };
  typography: {
    [key: string]: { [key: string]: string | number } | number | string;
  };
  palette: {
    [key: string]: string;
  };
  sizes: {
    layout: { [key: string]: string };
    icon: { [key: string]: string };
  };
  shadow: {
    [key: string]: string;
  };
}
