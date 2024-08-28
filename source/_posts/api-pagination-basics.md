---
title: API Pagination Basics
date: 2024-08-28
image: https://pbs.twimg.com/media/GWC4hEuawAAt21H?format=png&name=large
comments: false
---
Pagination is a technique to divide large datasets into smaller, more manageable chunks that can be retrieved separately. This improves performance and user experience by preventing huge amounts of data from being loaded at once.

There are two common pagination techniques: 

**Page-Based Pagination**

* Simple to implement 
* Allow jumping to specific pages easily

1. Decide the number of items per page (fixed or configurable). 
2. To get page N, calculate the start index as (N - 1) \* page_size. Use LIMIT and OFFSET to fetch that subset of data. For example: \`SELECT \* FROM table LIMIT 10 OFFSET 20;\`

**Cursor-Based Pagination**

* Efficient for large, constantly updating datasets
* Resilient to shifting rows, e.g. deleted records - Works well with infinite scroll designs

1. Choose an indexed column as the cursor. 
2. Hash the cursor value for security.
3. The client provides the hashed cursor value of the last item they saw. 
4. The server uses this cursor to filter and fetch the next page of results after that value.
5. The server returns the hashed cursor value of the last item in the current page. 6. The client uses the new cursor to fetch the next page.

**Best Practices for Large Datasets**

* Avoid OFFSET for large datasets. OFFSET scans the entire dataset which gets slower as the offset increases.
* Use cursor on indexed columns for efficient lookup of pages.

source: [@sahnlam](https://x.com/sahnlam)