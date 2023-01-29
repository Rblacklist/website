import usFlag from '../assets/flags/us.jpg';
import french from '../assets/flags/french.jpg';
import algeria from '../assets/flags/algeria.jpg';

interface Lang {
  label: string;
  flag: string;
  value: string;
}

const languages: Lang[] = [
  { value: 'fr', label: 'French', flag: french },
  { value: 'ar', label: 'Arabic', flag: algeria },
  { value: 'eng', label: 'English', flag: usFlag },
];

export default languages;
