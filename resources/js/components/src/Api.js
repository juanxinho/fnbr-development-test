import axios from 'axios';

export default axios.create({
  baseURL: 'https://www.universal-tutorial.com',
  headers: {
    'Access-Control-Allow-Origin': '*',
    'Authorization': `Bearer ${process.env.MIX_REST_COUNTRY_TOKEN}`,
  }
});
