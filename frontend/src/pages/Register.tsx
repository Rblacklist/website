import { Formik } from 'formik';
import { registerFormSchema } from '../validation/registerFormSchema';
import { registerFormInitialValues } from '../initialValues/register';
import { useAppDispatch, useAppSelector } from '../store';
import { registerUser } from '../store/features/user/userActions';
import { useNavigate } from 'react-router-dom';
import { useEffect } from 'react';
import {
  Alert,
  Button,
  Card,
  Col,
  Container,
  Form,
  Row,
  Spinner,
} from 'react-bootstrap';
import { Link } from 'react-router-dom';
import profile from '../assets/images/profile.png';

const Register = () => {
  const { loading, error, success } = useAppSelector((state) => state.user);
  const dispatch = useAppDispatch();
  const navigate = useNavigate();

  useEffect(() => {
    if (success) {
      navigate('/login');
    }
  }, [navigate, success]);

  return (
    <div className=' my-5 pt-sm-5'>
      <Container>
        <Row className='justify-content-center'>
          <Col md={8} lg={6} xl={5}>
            <Card className='overflow-hidden'>
              <div className='bg-primary bg-soft'>
                <Row>
                  <Col xs={7}>
                    <div className='text-primary p-4'>
                      <h5>Free Register</h5>
                      <p>Get your free account now.</p>
                    </div>
                  </Col>
                  <Col className='col-5 align-self-end'>
                    <img src={profile} alt='' className='img-fluid' />
                  </Col>
                </Row>
              </div>
              <Card.Body>
                <div className='p-2'>
                  <Formik
                    validationSchema={registerFormSchema}
                    initialValues={registerFormInitialValues}
                    onSubmit={({ email, firstName, lastName, password }) => {
                      dispatch(
                        registerUser({
                          email: email.toLowerCase(),
                          firstName,
                          lastName,
                          password,
                        })
                      );
                    }}
                  >
                    {({
                      handleSubmit,
                      handleChange,
                      handleBlur,
                      values,
                      touched,
                      errors,
                    }) => (
                      <Form onSubmit={handleSubmit}>
                        {error && <Alert variant='danger'>{error}</Alert>}
                        {success && (
                          <Alert variant='success'>registration success</Alert>
                        )}

                        <Form.Group className='mb-3' controlId='firstName'>
                          <Form.Label>First Name</Form.Label>
                          <Form.Control
                            type='text'
                            name='firstName'
                            placeholder='Enter first Name'
                            value={values.firstName}
                            isValid={touched.firstName && !errors.firstName}
                            isInvalid={touched.firstName && !!errors.firstName}
                            onChange={handleChange}
                            onBlur={handleBlur}
                          />
                          {touched.firstName && !!errors.firstName && (
                            <Form.Control.Feedback type='invalid'>
                              {errors.firstName}
                            </Form.Control.Feedback>
                          )}
                        </Form.Group>

                        <Form.Group className='mb-3' controlId='lastName'>
                          <Form.Label>Last Name</Form.Label>
                          <Form.Control
                            name='lastName'
                            type='text'
                            value={values.lastName}
                            isValid={touched.lastName && !errors.lastName}
                            isInvalid={touched.lastName && !!errors.lastName}
                            placeholder='Enter Last Name'
                            onChange={handleChange}
                            onBlur={handleBlur}
                          />
                          {touched.lastName && !!errors.lastName && (
                            <Form.Control.Feedback type='invalid'>
                              {errors.lastName}
                            </Form.Control.Feedback>
                          )}
                        </Form.Group>

                        <Form.Group className='mb-3' controlId='email'>
                          <Form.Label>Email</Form.Label>
                          <Form.Control
                            name='email'
                            type='email'
                            placeholder='Enter Email'
                            value={values.email}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.email && !errors.email}
                            isInvalid={touched.email && !!errors.email}
                          />
                          {touched.email && !!errors.email && (
                            <Form.Control.Feedback type='invalid'>
                              {errors.email}
                            </Form.Control.Feedback>
                          )}
                        </Form.Group>

                        <Form.Group className='mb-3' controlId='password'>
                          <Form.Label>Password</Form.Label>
                          <Form.Control
                            name='password'
                            type='password'
                            placeholder='Enter password'
                            value={values.password}
                            isValid={touched.password && !errors.password}
                            isInvalid={touched.password && !!errors.password}
                            onChange={handleChange}
                            onBlur={handleBlur}
                          />
                          {touched.password && !!errors.password && (
                            <Form.Control.Feedback type='invalid'>
                              {errors.password}
                            </Form.Control.Feedback>
                          )}
                        </Form.Group>

                        <Form.Group
                          className='mb-3'
                          controlId='confirmPassword'
                        >
                          <Form.Label>Confirm password</Form.Label>
                          <Form.Control
                            name='confirmPassword'
                            type='password'
                            placeholder='Enter your password again'
                            value={values.confirmPassword}
                            isValid={
                              touched.confirmPassword && !errors.confirmPassword
                            }
                            isInvalid={
                              touched.confirmPassword &&
                              !!errors.confirmPassword
                            }
                            onChange={handleChange}
                            onBlur={handleBlur}
                          />
                          {touched.confirmPassword &&
                            !!errors.confirmPassword && (
                              <Form.Control.Feedback type='invalid'>
                                {errors.confirmPassword}
                              </Form.Control.Feedback>
                            )}
                        </Form.Group>

                        <Form.Group className='mb-3' controlId='terms'>
                          <Form.Check
                            name='terms'
                            required
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isInvalid={touched.terms && !!errors.terms}
                            feedback={errors.terms}
                            type='checkbox'
                            label='Agree on Terms and Privacy Policy'
                          />
                        </Form.Group>
                        <Button
                          variant='primary'
                          type='submit'
                          disabled={loading}
                        >
                          Register{' '}
                          {loading && (
                            <Spinner size='sm' animation='border' role='status'>
                              <span className='visually-hidden'>
                                Loading...
                              </span>
                            </Spinner>
                          )}
                        </Button>
                      </Form>
                    )}
                  </Formik>
                </div>
              </Card.Body>
            </Card>
            <div className='mt-5 text-center'>
              <p>
                Already have an account ?{' '}
                <Link to='/login' className='fw-medium text-primary'>
                  Login
                </Link>
              </p>
              <p>© {new Date().getFullYear()} RBlacklist.</p>
            </div>
          </Col>
        </Row>
      </Container>
    </div>
  );
};

export default Register;
