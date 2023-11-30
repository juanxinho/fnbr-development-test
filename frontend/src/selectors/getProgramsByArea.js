import { areas } from "../data/areas"

export const getProgramsByArea = (area) => {
    const foundArea = areas.find(programs => programs.area === area);
    return foundArea ? foundArea.programs : [];
}
