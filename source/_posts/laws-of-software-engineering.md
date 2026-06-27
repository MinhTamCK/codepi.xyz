---
image: https://codepi.xyz/assets/img/laws-of-software-engineering.jpg
title: Laws of Software Engineering
date: 2026-04-22
comments: false
---
## 1. Brooks' Law

"Adding manpower to a late software project makes it later."

"Thêm người vào một dự án phần mềm đang trễ chỉ làm nó trễ hơn."

New team members need time to learn the codebase, and communication overhead grows exponentially (n²).

Người mới cần thời gian học codebase, và chi phí giao tiếp tăng theo cấp số nhân (n²).

**Source:** Fred Brooks — *The Mythical Man-Month* (1975)

---

## 2. Conway's Law

"Organizations design systems that mirror their own communication structure."

"Tổ chức thiết kế hệ thống phản ánh cấu trúc giao tiếp của chính họ."

Three teams will produce a three-module system. Want good architecture? Organize your teams well first.

Ba đội sẽ tạo ra hệ thống ba module. Muốn kiến trúc tốt? Hãy tổ chức đội nhóm tốt trước.

**Source:** Melvin Conway (1967)

---

## 3. Hofstadter's Law

"It always takes longer than you expect, even when you take into account Hofstadter's Law."

"Mọi thứ luôn mất nhiều thời gian hơn bạn dự kiến, kể cả khi bạn đã tính đến quy luật Hofstadter."

Time estimates are always wrong. Always double your estimate.

Ước lượng thời gian luôn sai. Luôn nhân đôi con số dự kiến.

**Source:** Douglas Hofstadter — *Gödel, Escher, Bach* (1979)

---

## 4. Ninety-Ninety Rule

"The first 90% of the code accounts for the first 90% of development time. The remaining 10% accounts for the other 90%."

"90% đầu tiên của mã nguồn chiếm 90% thời gian phát triển. 10% còn lại chiếm thêm 90% thời gian nữa."

Finishing is the hardest part.

Hoàn thiện là phần khó nhất.

**Source:** Tom Cargill, Bell Labs

---

## 5. Knuth's Law (Premature Optimization)

"Premature optimization is the root of all evil."

"Tối ưu hoá sớm là gốc rễ của mọi tội lỗi."

Write correct code first, optimize later.

Viết mã chạy đúng trước, tối ưu sau.

**Source:** Donald Knuth (1974)

---

## 6. Kernighan's Law

"Debugging is twice as hard as writing the code in the first place. Therefore, if you write the code as cleverly as possible, you are, by definition, not smart enough to debug it."

"Gỡ lỗi khó gấp đôi viết mã. Vì vậy, nếu bạn viết mã thông minh hết mức có thể, theo định nghĩa, bạn không đủ giỏi để gỡ lỗi nó."

Keep It Simple — KISS.

Giữ cho đơn giản.

**Source:** Brian Kernighan — *The Elements of Programming Style*

---

## 7. Linus's Law

"Given enough eyeballs, all bugs are shallow."

"Có đủ nhiều mắt nhìn thì mọi lỗi đều dễ tìm."

Code review and open source lead to fewer bugs.

Đánh giá mã nguồn và mã nguồn mở giúp giảm lỗi.

**Source:** Eric S. Raymond — *The Cathedral and the Bazaar* (1999)

---

## 8. Gall's Law

"A complex system that works is invariably found to have evolved from a simple system that worked."

"Một hệ thống phức tạp hoạt động được luôn được phát triển từ một hệ thống đơn giản đã hoạt động được."

Start simple, evolve gradually. Never design something complex from scratch.

Bắt đầu đơn giản, phát triển dần. Đừng bao giờ thiết kế phức tạp ngay từ đầu.

**Source:** John Gall — *Systemantics* (1975)

---

## 9. CAP Theorem

"A distributed system can only guarantee two of three: Consistency, Availability, and Partition Tolerance."

"Một hệ thống phân tán chỉ có thể đảm bảo hai trong ba: Tính nhất quán, Tính sẵn sàng, và Khả năng chịu phân vùng."

You must choose a trade-off. You cannot have all three.

Bạn phải chọn sự đánh đổi. Không thể có cả ba.

**Source:** Eric Brewer (2000)

---

## 10. Postel's Law (Robustness Principle)

"Be conservative in what you send, be liberal in what you accept."

"Hãy chặt chẽ khi gửi đi, rộng lượng khi nhận vào."

Strict output, flexible input.

Đầu ra nghiêm ngặt, đầu vào linh hoạt.

**Source:** Jon Postel — RFC 761 (1980)

---

## 11. Pareto Principle (80/20)

"80% of effects come from 20% of causes."

"80% kết quả đến từ 20% nguyên nhân."

20% of features serve 80% of users. Fixing 20% of bugs resolves 80% of complaints.

20% tính năng phục vụ 80% người dùng. Sửa 20% lỗi giải quyết 80% phàn nàn.

**Source:** Vilfredo Pareto (1896)

---

## 12. YAGNI

"You Aren't Gonna Need It — Don't build functionality until it is necessary."

"Bạn sẽ không cần đâu — Đừng xây dựng chức năng cho đến khi thực sự cần thiết."

Avoid over-engineering. Code for today, not for an imaginary future.

Tránh thiết kế quá mức. Viết mã cho hôm nay, không phải cho tương lai tưởng tượng.

**Source:** Extreme Programming — Ron Jeffries

---

## 13. Boy Scout Rule

"Leave the code cleaner than you found it."

"Rời đi để mã nguồn sạch hơn lúc bạn đến."

Every time you touch code, improve it a little.

Mỗi lần chạm vào mã, hãy cải thiện nó một chút.

**Source:** Robert C. Martin — *Clean Code*

---

## 14. Law of Leaky Abstractions

"All non-trivial abstractions, to some degree, are leaky."

"Mọi sự trừu tượng hoá không tầm thường đều bị rò rỉ ở một mức nào đó."

No abstraction perfectly hides the complexity underneath.

Không có lớp trừu tượng nào che giấu hoàn hảo sự phức tạp bên dưới.

**Source:** Joel Spolsky (2002)

---

## 15. Murphy's Law (in Software)

"Anything that can go wrong will go wrong."

"Bất cứ điều gì có thể sai sẽ sai."

Always handle edge cases. Always have a backup plan.

Luôn xử lý các trường hợp ngoại lệ. Luôn có phương án dự phòng.