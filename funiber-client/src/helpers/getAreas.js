export const getAreas = async () => {
  const url = `http://localhost:8000/api/areas`;
  const resp = await fetch(url);
  const { data: areas } = await resp.json();

  const areasInfo = areas.map((info) => {
    return {
      id: info.id,
      name: info.name,
    };
  });

  return areasInfo;
};
