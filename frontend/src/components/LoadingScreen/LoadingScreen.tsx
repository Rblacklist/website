import styled from 'styled-components';

type Props = {};

const SvgLoadingScreen = (props: Props) => {
  return (
    <svg
      version='1.1'
      id='L9'
      xmlns='http://www.w3.org/2000/svg'
      xmlnsXlink='http://www.w3.org/1999/xlink'
      x='0px'
      y='0px'
      viewBox='0 0 100 100'
      enableBackground='new 0 0 0 0'
      xmlSpace='preserve'
      {...props}
    >
      <rect x='20' y='50' width='4' height='10' fill='#000'>
        <animateTransform
          attributeType='xml'
          attributeName='transform'
          type='translate'
          values='0 0; 0 20; 0 0'
          begin='0'
          dur='0.6s'
          repeatCount='indefinite'
        />
      </rect>
      <rect x='30' y='50' width='4' height='10' fill='#000'>
        <animateTransform
          attributeType='xml'
          attributeName='transform'
          type='translate'
          values='0 0; 0 20; 0 0'
          begin='0.2s'
          dur='0.6s'
          repeatCount='indefinite'
        />
      </rect>
      <rect x='40' y='50' width='4' height='10' fill='#000'>
        <animateTransform
          attributeType='xml'
          attributeName='transform'
          type='translate'
          values='0 0; 0 20; 0 0'
          begin='0.4s'
          dur='0.6s'
          repeatCount='indefinite'
        />
      </rect>
    </svg>
  );
};

export const LoadingScreen = styled(SvgLoadingScreen)`
  width: 150px;
  height: 150px;
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
`;
