export interface RegistrationRequestBody {
  firstName: string;
  lastName: string;
  email: string;
  password: string;
}

export interface RegistrationFormValues extends RegistrationRequestBody {
  confirmPassword: string;
  terms: boolean;
}

export interface RegistrationResponse {
  userId: string;
  linkId: string;
  phoneValidate: string;
}
