interface Props {
  name: string;
  value: any;
}

export const saveToAsyncStorage = (props: Props) => {
  localStorage.setItem(props.name, props.value);
};

export const getFromAsyncStorage = (name: string) => {
  return localStorage.getItem(name);
};

export const clearAsyncStorage = () => {};
