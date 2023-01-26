import * as yup from 'yup';

export const registerFormSchema = yup.object().shape({
  firstName: yup.string().required(),
  lastName: yup.string().required(),
  terms: yup.bool().required().oneOf([true], 'terms must be accepted'),
  email: yup.string().email().required(),
  password: yup
    .string()
    .required('No password provided.')
    .min(8, 'Password is too short - should be 8 chars minimum.')
    .matches(/[a-zA-Z]/, 'Password can only contain Latin letters.'),
  confirmPassword: yup
    .string()
    .required('confirm your password')
    .oneOf([yup.ref('password')], 'Passwords must match'),
});
