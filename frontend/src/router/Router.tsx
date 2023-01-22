import React, { Suspense } from 'react';
import { BrowserRouter, RouteProps, Route, Routes } from 'react-router-dom';
import { LoadingScreen } from '../components/LoadingScreen/LoadingScreen';

const Login = React.lazy(() => import('../pages/Login'));
const Landing = React.lazy(() => import('../pages/Landing'));

const routes: RouteProps[] = [
  {
    path: '/login',
    element: <Login />,
  },
  {
    path: '/',
    element: <Landing />,
  },
];

export const Router = () => {
  return (
    <Suspense fallback={<LoadingScreen />}>
      <BrowserRouter>
        <Routes>
          {routes.map((route) => (
            <Route {...route} />
          ))}
        </Routes>
      </BrowserRouter>
    </Suspense>
  );
};
