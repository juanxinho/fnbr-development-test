export const getProgramsById = async (areaId) => {
  const url = `http://localhost:8000/api/programs/${areaId}`;
  const resp = await fetch(url);
  const { data: programs } = await resp.json();

  const programsInfo = programs.map((info) => {
    return {
      area_id: info.area_id,
      name: info.name,
    };
  });

  return programsInfo;
};
