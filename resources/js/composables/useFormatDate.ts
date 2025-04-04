import { format } from 'date-fns';

export const useFormatDate = () => {
    return (date: Date) => format(date, 'dd MMM, yyyy hh:mm:ssaaa');
};
