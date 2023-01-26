import { createAsyncThunk } from '@reduxjs/toolkit';
import { RegistrationRequestBody } from '../../../types/register';
import { authService } from '../../../api';
import { LoginRequestBody } from '../../../types/login';
import { saveToAsyncStorage } from '../../../utils/saveToCookies';
import { AxiosResponse } from 'axios';
import { User } from '../../../types/user';

export const registerUser = createAsyncThunk(
  'user/register',
  async (
    { firstName, email, password, lastName }: RegistrationRequestBody,
    { rejectWithValue }
  ) => {
    try {
      await authService.fetchSignUp({
        firstName,
        email,
        password,
        lastName,
      });
    } catch (error) {
      if (error.response && error.response.data.message) {
        return rejectWithValue(error.response.data.message);
      } else {
        return rejectWithValue(error.message);
      }
    }
  }
);

export const LoginUser = createAsyncThunk(
  'user/login',
  async (
    { email, password, rememberMe }: LoginRequestBody,
    { rejectWithValue }
  ) => {
    try {
      const { data }: AxiosResponse<User> = await authService.fetchLogin({
        email,
        password,
        rememberMe,
      });

      saveToAsyncStorage({ name: 'authentication', value: data.token });

      return data;
    } catch (error) {
      if (error.response && error.response.data.message) {
        return rejectWithValue(error.response.data.message);
      } else {
        return rejectWithValue(error.message);
      }
    }
  }
);
