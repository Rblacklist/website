import { createSlice } from '@reduxjs/toolkit';
import { User } from '../../../types/user';
import { getFromAsyncStorage } from '../../../utils/saveToCookies';
import { LoginUser, registerUser } from './userActions';

interface InitialUserState {
  user: User | null;
  token: string | null;
  loading: boolean;
  error: string | null;
  success: boolean;
}

const token = getFromAsyncStorage('authentication');

const initialState: InitialUserState = {
  user: null,
  token,
  loading: false,
  error: null,
  success: false,
};

export const userSlice = createSlice({
  initialState,
  name: 'userSlice',
  reducers: {},
  extraReducers: (builder) => {
    builder.addCase(LoginUser.pending, (state) => {
      state.loading = true;
      state.error = null;
    });
    builder.addCase(LoginUser.fulfilled, (state, { payload }) => {
      state.loading = false;
      state.user = payload;
      state.token = payload.token;
    });
    builder.addCase(LoginUser.rejected, (state, { payload }) => {
      state.loading = false;
      state.error = payload as string;
    });

    builder.addCase(registerUser.pending, (state) => {
      state.loading = true;
      state.error = null;
    });
    builder.addCase(registerUser.fulfilled, (state) => {
      state.loading = false;
      state.success = true;
    });
    builder.addCase(registerUser.rejected, (state, { payload }) => {
      state.loading = false;
      state.error = payload as string;
    });
  },
});

export default userSlice.reducer;
