import { Router } from './router/Router';
import { ThemeProvider } from 'styled-components';
import { light } from './theme/light';
import CSSRests from './components/utils/CssResets';
import './index.css';

function App() {
  return (
    <ThemeProvider theme={light}>
      <CSSRests />
      <Router />
    </ThemeProvider>
  );
}

export default App;
