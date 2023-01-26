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
import { Formik } from 'formik';
import { loginFormSchema } from '../validation/LoginFormSchema';
import { loginFormInitialValues } from '../initialValues/login';
import { useAppDispatch, useAppSelector } from '../store';
import { useNavigate } from 'react-router-dom';
import { useEffect } from 'react';
import { Link } from 'react-router-dom';
import { LoginUser } from '../store/features/user/userActions';
import profile from '../assets/images/profile.png';

const Login = () => {
  const { loading, error, success, user } = useAppSelector(
    (state) => state.user
  );
  const dispatch = useAppDispatch();
  const navigate = useNavigate();

  useEffect(() => {
    if (user) {
      navigate('/dashboard');
    }
  }, [navigate, user]);

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
                      <h5>Welcome Back !</h5>
                      <p>Sign in to continue.</p>
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
                    validationSchema={loginFormSchema}
                    initialValues={loginFormInitialValues}
                    onSubmit={({ email, password, rememberMe }) => {
                      dispatch(
                        LoginUser({
                          email: email.toLowerCase(),
                          password,
                          rememberMe,
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
                        <Form.Group className='mb-3' controlId='email'>
                          <Form.Label>Email</Form.Label>
                          <Form.Control
                            name='email'
                            type='email'
                            placeholder='Enter Email'
                            value={values.email}
                            isValid={touched.email && !errors.email}
                            isInvalid={touched.email && !!errors.email}
                            onChange={handleChange}
                            onBlur={handleBlur}
                          />

                          {touched.email && !!errors.email && (
                            <Form.Control.Feedback type='invalid'>
                              {errors.email}
                            </Form.Control.Feedback>
                          )}
                        </Form.Group>

                        <Form.Group className='mb-3' controlId='email'>
                          <Form.Label>password</Form.Label>
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
                        <Form.Group className='mb-3' controlId='rememberMe'>
                          <Form.Check
                            name='rememberMe'
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isInvalid={
                              touched.rememberMe && !!errors.rememberMe
                            }
                            feedback={errors.rememberMe}
                            type='checkbox'
                            label='Remember Me'
                          />
                        </Form.Group>
                        <Button
                          variant='primary'
                          type='submit'
                          disabled={loading}
                        >
                          Login{' '}
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
                Don&#39;t have an account ?{' '}
                <Link to='/register' className='fw-medium text-primary'>
                  {' '}
                  Signup now{' '}
                </Link>{' '}
              </p>
              <p>© {new Date().getFullYear()} RBlacklist.</p>
            </div>
          </Col>
        </Row>
      </Container>
    </div>
  );
};

export default Login;
