import axios from 'axios';

const BASE_URL = 'http://localhost:8080';

export class Axios {
  serverUrl = `${BASE_URL}`;
  defaultHeaders = {
    'Content-Type': 'application/json',
  };

  getJSON = (url: string, headers?: { [key: string]: string }) =>
    axios.get(`${this.serverUrl}/${url}`, {
      headers: { ...this.defaultHeaders, ...headers },
    });

  post = (url: string, body?: any, headers?: { [key: string]: string }) =>
    axios.post(`${this.serverUrl}/${url}`, body, {
      headers: { ...this.defaultHeaders, ...headers },
    });

  put = (url: string, body?: any, headers?: { [key: string]: string }) =>
    axios.patch(`${this.serverUrl}/${url}`, body, {
      headers: { ...this.defaultHeaders, ...headers },
    });

  patch = (url: string, body?: any, headers?: { [key: string]: string }) =>
    axios.patch(`${this.serverUrl}/${url}`, body, {
      headers: { ...this.defaultHeaders, ...headers },
    });

  delete = (url: string) => axios.delete(`${this.serverUrl}/${url}`);
}
