import { useEffect, useState } from 'react';
import { Dropdown } from 'react-bootstrap';
import { useTranslation } from 'react-i18next';
import languages from '../../translations/languages';

export const LanguageDropdown = () => {
  const [selectedLang, setSelectedLang] = useState('');
  const { i18n } = useTranslation();

  useEffect(() => {
    const currentLanguage = localStorage.getItem('I18N_LANGUAGE');
    if (currentLanguage) {
      setSelectedLang(currentLanguage);
    }
  }, []);

  const changeLanguageAction = (lang: string) => {
    i18n.changeLanguage(lang);
    localStorage.setItem('I18N_LANGUAGE', lang);
    setSelectedLang(lang);
  };

  return (
    <>
      <Dropdown className='d-inline-block'>
        <Dropdown.Toggle className='btn header-item '>
          <img
            src={languages.find((lang) => lang.value === i18n.language)?.flag}
            alt=''
            height='16'
            className='me-1'
          />
        </Dropdown.Toggle>
        <Dropdown.Menu className='language-switch dropdown-menu-end'>
          <>
            {languages.map((lang) => (
              <Dropdown.Item
                key={lang.label}
                onClick={() => changeLanguageAction(lang.value)}
                className={`notify-item ${
                  selectedLang === lang.value ? 'active' : 'none'
                }`}
              >
                <img src={lang.flag} alt='Skote' className='me-1' height='12' />
                <span className='align-middle'>{lang.label}</span>
              </Dropdown.Item>
            ))}
          </>
        </Dropdown.Menu>
      </Dropdown>
    </>
  );
};
