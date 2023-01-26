import React, { Suspense } from 'react';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import { LoadingScreen } from '../components/LoadingScreen/LoadingScreen';
import ProtectedRoute from './ProtectedRoute';

const Register = React.lazy(() => import('../pages/Register'));
const Login = React.lazy(() => import('../pages/Login'));
const Landing = React.lazy(() => import('../pages/Landing'));
const Dashboard = React.lazy(() => import('../pages/Dashboard'));

const routes = [
  {
    path: '/register',
    element: <Register />,
  },
  {
    path: '/login',
    element: <Login />,
  },
  {
    path: '/',
    element: <Landing />,
  },
];

const protectedRoutes = [
  {
    path: '/dashboard',
    element: <Dashboard />,
  },
];

export const Router = () => {
  return (
    <Suspense fallback={<LoadingScreen />}>
      <BrowserRouter>
        <Routes>
          {routes.map((route, index) => (
            <Route key={`${index}~${route.path}`} {...route} />
          ))}
          <Route element={<ProtectedRoute />}>
            {protectedRoutes.map((route, index) => (
              <Route key={`${index}~${route.path}`} {...route} />
            ))}
          </Route>
        </Routes>
      </BrowserRouter>
    </Suspense>
  );
};
