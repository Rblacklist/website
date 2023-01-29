import { Router } from './router/Router';
import { ThemeProvider } from 'styled-components';
import { light } from './theme/light';
import CSSRests from './components/utils/CssResets';
import './theme/bootstrap/index.scss';
import { Provider } from 'react-redux';
import { store } from './store';
import { I18nextProvider } from 'react-i18next';
import i18n from './translations/i18n';

function App() {
  return (
    <Provider store={store}>
      <I18nextProvider i18n={i18n}>
        <ThemeProvider theme={light}>
          <CSSRests />
          <Router />
        </ThemeProvider>
      </I18nextProvider>
    </Provider>
  );
}

export default App;
