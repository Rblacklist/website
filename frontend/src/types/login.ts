import { User } from './user';

export interface LoginForm {
  email: string;
  password: string;
  rememberMe: boolean;
}

export interface LoginRequestBody {
  email: string;
  password: string;
  rememberMe: boolean;
}

export type LoginResponse = {
  status: string;
  message: string;
  data: User;
};
