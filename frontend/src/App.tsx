import { Router } from './router/Router';
import { ThemeProvider } from 'styled-components';
import { light } from './theme/light';
import CSSRests from './components/utils/CssResets';
import './theme/bootstrap/index.scss';
import { Provider } from 'react-redux';
import { store } from './store';

function App() {
  return (
    <Provider store={store}>
      <ThemeProvider theme={light}>
        <CSSRests />
        <Router />
      </ThemeProvider>
    </Provider>
  );
}

export default App;
