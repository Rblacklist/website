import { useNavigate } from 'react-router-dom';
import { useEffect } from 'react';

const Landing = () => {
  const navigate = useNavigate();

  useEffect(() => {
    navigate('/login');
  });

  return <div></div>;
};

export default Landing;
