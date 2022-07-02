import React from 'react';
import { getAreas } from '../helpers/getAreas';

export const useFetchAreas = () => {
  const [state, setState] = React.useState({
    data: [],
    loading: true,
  });

  React.useEffect(() => {
    getAreas().then((area) => {
      setState({
        data: area,
        loading: false,
      });
    });
  }, []);

  return state;
};
