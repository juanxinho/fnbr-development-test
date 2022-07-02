import React from 'react';
import { getProgramsById } from '../helpers/getProgramsById';

export const useFetchProgramsById = (areaId) => {
  const [state, setState] = React.useState({
    data: [],
    loading: true,
  });

  React.useEffect(() => {
    getProgramsById(areaId).then((programs) => {
      setState({
        data: programs,
        loading: false,
      });
    });
  }, [areaId]);

  return state;
};
