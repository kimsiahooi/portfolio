export interface Wordle {
    readonly id: number;
    word: string;
    length: number;
    readonly created_at: Date;
    readonly updated_at: Date;
}
