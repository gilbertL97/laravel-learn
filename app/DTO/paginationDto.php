<?php

class PaginationDTO
{
    public int $perPage;
    public int $page;

    public function __construct(int $perPage = 10, int $page = 1)
    {
        $this->perPage = $perPage;
        $this->page = $page;
    }

    public static function fromRequest(\Illuminate\Http\Request $request): self
    {
        return new self(
            (int) $request->input('per_page', 10),
            (int) $request->input('page', 1)
        );
    }
}
