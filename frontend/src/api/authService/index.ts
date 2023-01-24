import { LoginRequestBody } from '../../types/login';
import { RegistrationRequestBody } from '../../types/register';
import { Axios } from '../axios';

class AuthService extends Axios {
  pathname = 'auth';

  fetchRefresh = (headers: { [key: string]: string }) =>
    this.getJSON(`${this.pathname}/refresh`, headers);

  fetchLogin = (body?: LoginRequestBody) =>
    this.post(`${this.pathname}/login`, body);

  fetchLogout = () => this.getJSON(`${this.pathname}/logout`);

  fetchSignUp = (body?: RegistrationRequestBody) =>
    this.post(`${this.pathname}/signup`, body);
}

export const authService = new AuthService();
