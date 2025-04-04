interface Link {
    readonly active: boolean;
    readonly label: string;
    readonly url: string | null;
}

export interface PaginatedData<T> {
    readonly current_page: number;
    readonly data: T;
    readonly first_page_url: string;
    readonly from: number;
    readonly last_page: number;
    readonly last_page_url: string;
    readonly links: Link[];
    readonly next_page_url: string | null;
    readonly path: string;
    readonly per_page: number;
    readonly prev_page_url: string | null;
    readonly to: number;
    readonly total: number;
}
