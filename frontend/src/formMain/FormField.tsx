import { Box, TextField, Typography } from "@mui/material";
import { Field, ErrorMessage } from "formik";

interface Props {
	label: string;
	name: string;
	[key: string]: any;
}

export default function FormField({ label, name, ...rest }: Props): JSX.Element {
	return (
		<Box mb={1.5}>
			<Field {...rest} name={name} as={TextField} label={label} fullWidth />
			<Box mt={0.75}>
				<Typography component="div" variant="caption" color="error" fontWeight="regular">
					{(<ErrorMessage name={name} />) as any}
				</Typography>
			</Box>
		</Box>
	);
}