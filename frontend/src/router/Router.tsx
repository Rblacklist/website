import React, { Suspense } from 'react';
import { BrowserRouter, RouteProps, Route, Routes } from 'react-router-dom';

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
    <Suspense fallback={<div>loading...</div>}>
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
